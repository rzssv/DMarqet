<?php
  class ReplDB {
    public string $url;

    public function __construct(string $url = "") {
      if ($url === "") {
        $url = getenv("REPLIT_DB_URL");
      }
      $this->url = $url;
    }

    public function get(...$keys) {
      $keyCount = count($keys);
      if ($keyCount <= 0) {
        return null;
      } else if ($keyCount === 1) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "$this->url/$keys[0]");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpcode >= 200 && $httpcode < 300) {
          return json_decode($data);
        }
      } else {
        $result = array();
        for ($i = 0; $i < $keyCount; $i++) {
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, "$this->url/$keys[$i]");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_HEADER, false);
          $data = curl_exec($curl);
          $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
          curl_close($curl);
          if ($httpcode >= 200 && $httpcode < 300) {
            $result[$keys[$i]] = json_decode($data);
          }
        }
        return $result;
      }
      return null;
    }

    public function set(...$args) {
      $arr = array();
      for ($i = 0; $i < count($args); $i += 2) {
        $arr[$args[$i]] = json_encode($args[$i + 1]);
      }
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $this->url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($arr));
      curl_setopt($curl, CURLOPT_HEADER, false);
      $data = curl_exec($curl);
      $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      curl_close($curl);
      return $httpcode >= 200 && $httpcode < 300;
    }

    public function delete(string $key) {
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, "$this->url/$key");
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($curl, CURLOPT_HEADER, false);
      $data = curl_exec($curl);
      $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      curl_close($curl);
      return $httpcode >= 200 && $httpcode < 300;
    }

    public function list(string $prefix = "") {
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, "$this->url?encode=true&prefix=$prefix");
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HEADER, false);
      $data = curl_exec($curl);
      $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      curl_close($curl);
      if ($httpcode >= 200 && $httpcode < 300) {
        return explode("\n", $data);
      }
      return array();
    }
  }
?>