<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Xabbuh\XApi\Model;

use PhpSpec\ObjectBehavior;
use Xabbuh\XApi\Model\Score;

class ResultSpec extends ObjectBehavior
{
    function its_properties_can_be_read()
    {
        $score = new Score(1);
        $this->beConstructedWith($score, true, true, 'test', 'PT2H');

        $this->getScore()->shouldReturn($score);
        $this->getSuccess()->shouldReturn(true);
        $this->getCompletion()->shouldReturn(true);
        $this->getResponse()->shouldReturn('test');
        $this->getDuration()->shouldReturn('PT2H');
    }

    function it_can_be_empty()
    {
        $this->getScore()->shouldReturn(null);
        $this->getSuccess()->shouldReturn(null);
        $this->getCompletion()->shouldReturn(null);
        $this->getResponse()->shouldReturn(null);
        $this->getDuration()->shouldReturn(null);
    }
}
