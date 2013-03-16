<?php

namespace Entity;


/**
 * @property int	$user_id
 * @property string	$text
 * @property string	$file
 * @property string	$template
 * @property int 	$timestamp
 */
class Translation extends \ORM\EntityUrl
{

	public function buildTemplate()
	{
		$matches = [];
		$template = file_get_contents(WWW_DIR . '/exercise/exercises/' . $this->file . '.html');

		preg_match_all('~(?P<tid>\d+\.\d+)\s+(?P<text>.*?)\n$~ims', $this->text, $matches);

		$this->template = preg_replace_callback('~
			(?P<prepend>
				<(p|title)
				.*?
			)
			\s+data-tid="(?P<tid>\d+\.\d+)"\s*
			(?P<prepend2>
				/?>)(?P<inner>.*?)(?P<append></(\2)>)
		~imsx',
			function ($match) use ($matches) {
				foreach ($matches['tid'] as $i => $tid) {
					if (strcmp($tid, $match['tid']) === 0) {
						break;
					}
				}

				return ($match['prepend'] . $match['prepend2'] . $matches['text'][$i] . $match['append']);
			}, $template);
		$this->update();
	}

}
