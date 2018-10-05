<?php

Class Connections {

	function TopHeadlines() {

		$ch = curl_init("https://newsapi.org/v2/top-headlines?country=us&apiKey=a38899b31f074d749a1a5da7abb5b09d");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$result = curl_exec($ch);
		if (!$result) {
			return false;
		} else {
			$json2 = json_decode($result, true);
			return $json2;
		}

	}

	function LatestNews() {

		$ch = curl_init("https://newsapi.org/v2/everything?domains=wsj.com,nytimes.com&apiKey=a38899b31f074d749a1a5da7abb5b09d");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$result = curl_exec($ch);
		if (!$result) {
			return false;
		} else {
			$json2 = json_decode($result, true);
			return $json2;
		}

	}

}

?>