<?php

namespace TabletModule;


class HomepagePresenter extends BaseTabletPresenter
{

    public function renderDefault()
    {
        $this->template->subjects = $this->context->categories->findRoot();
    }

}
