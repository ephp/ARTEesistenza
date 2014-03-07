<?php

namespace AE\BlogBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AEBlogBundle extends Bundle {

    public function getParent() {
        return 'EphpBlogBundle';
    }

}
