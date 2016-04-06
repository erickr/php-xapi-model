<?php

namespace spec\Xabbuh\XApi\Model;

use PhpSpec\ObjectBehavior;
use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\ActivityProfile;
use Xabbuh\XApi\Model\DocumentData;

class ActivityProfileDocumentSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new ActivityProfile('id', new Activity('http://tincanapi.com/conformancetest/activityid')), new DocumentData(array(
            'x' => 'foo',
            'y' => 'bar',
        )));
    }

    function it_is_a_document()
    {
        $this->shouldHaveType('Xabbuh\XApi\Model\Document');
    }

    function its_data_can_be_read()
    {
        $this->offsetExists('x')->shouldReturn(true);
        $this->offsetGet('x')->shouldReturn('foo');
        $this->offsetExists('y')->shouldReturn(true);
        $this->offsetGet('y')->shouldReturn('bar');
        $this->offsetExists('z')->shouldReturn(false);
    }

    function it_throws_exception_when_not_existing_data_is_being_read()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringOffsetGet('z');
    }

    function its_data_cannot_be_manipulated()
    {
        $this->shouldThrow('\Xabbuh\XApi\Common\Exception\UnsupportedOperationException')->duringOffsetSet('z', 'baz');
        $this->shouldThrow('\Xabbuh\XApi\Common\Exception\UnsupportedOperationException')->duringOffsetUnset('x');
    }
}