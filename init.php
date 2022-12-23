<?php class twitter_fix extends Plugin {
        private $host;
        function about() {
                return array(1.0,
                        "gets rid of line breaks between images so they wrap on widescreen",
                        "swack");
        }
        function init($host) {
                $this->host = $host;
                $host->add_hook($host::HOOK_ARTICLE_FILTER, $this);
        }
        function hook_article_filter($article) {
        	$result = str_replace("'><br>\n<br>","'>",$article["content"]);

			$article["content"] = $result;
		
		        $subject = $article["content"];
        		$pattern = '~(<a.href="https:\/\/pbs.twimg.com\/profile_images)(.*?)(">.*?<\/a>)~mi';
        		$replacement = '';
        		$article["content"] = preg_replace($pattern,$replacement,$subject);

                return $article;
        }
        function api_version() {
                return 2;
        }
}
