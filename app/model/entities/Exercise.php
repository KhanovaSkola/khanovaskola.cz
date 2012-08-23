<?php

/**
 * @property string	$label
 * @property string	$slug	Webalized $label
 * @property string	$file
 */
class Exercise extends Entity
{

    /**
     * @return Video[]
     */
    public function getRelatedVideos()
	{
		return $this->context->videos->findByExercise($this);
	}


    /**
     * @return string
     */
    public function getDescription()
	{
		if ($this->getRelatedVideos()->count()) {
			$desc = [];
			$labels = [];
			foreach ($this->getRelatedVideos() as $video) {
				if ($video->description) {
					$desc[] = $video->description;
				}
				$labels[] = $video->label;
			}

            $ret = '';
            if (count($desc)) {
				$ret = implode(' ', $desc);
			} else {
				$ret = "Cvičení {$this->label} pro lekc" . (count($labels) > 1 ? 'e ' : 'i ') . implode(', ', $labels);
			}

            if (isset($video)) { // last from iterator
                $parent = $video->getCategory();
                $cats = [];
                while ($parent) {
                    $cats[] = $parent->label;
                    $parent = $parent->getParent();
                }
                $cats = array_reverse($cats);

                $ret = implode(" ≫ ", $cats) . ": $ret.";
            }

            return $ret;
		}

		return "Cvičení {$this->label} na Khanově škole.";
	}

}
