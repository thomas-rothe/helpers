class SocialMedia extends ObjectModel
{
	public $user;
	public $post;

	public function __construct($type = false) {
		if(!$type) {
			throw new InvalidArgumentException('No social media provider passed as argument.');
		}
		switch ($type) {
			case 'facebook':
				$this->setFacebookUser();
				$this->setFacebookPost();
				break;
			case 'youtube':
				$this->setYoutubeUser();
				$this->setYoutubePost();
				break;
			case 'instagram':
				$this->setInstagramUser();
				$this->setInstagramPost();
				break;
			default:
				throw new InvalidArgumentException('Unknown social media provider: ' . $type . '.');
		}
	}

	public function setYoutubeUser($user)
	{
		$this->user = $user;
	}

	public function setYoutubePost($post)
	{
		$this->post = $post;
	}
}
