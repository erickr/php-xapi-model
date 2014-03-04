<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApiCommon\Tests\Model;

use Xabbuh\XApiCommon\Model\Agent;
use Xabbuh\XApiCommon\Model\IFI;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class AgentTest extends ModelTest
{
    public function testDeserialize()
    {
        /** @var \Xabbuh\XApiCommon\Model\Agent $agent */
        $agent = $this->deserialize($this->loadFixture('agent'));

        $this->assertEquals('Christian', $agent->getName());
        $this->assertEquals('mailto:christian@example.com', $agent->getMbox());
    }

    public function testSerialize()
    {
        $agent = new Agent();
        $agent->setName('Christian');
        $agent->setMbox('mailto:christian@example.com');

        $this->serializeAndValidateData($this->loadFixture('agent'), $agent);
    }

    public function testValidateAgent()
    {
        $agent = $this->loadAndDeserialize('agent');

        $this->validateAgent($agent, 0);
    }

    public function testValidateAgentWithoutInverseFunctionalIdentifier()
    {
        $agent = new Agent();

        $this->validateAgent($agent, 1);
    }

    private function validateAgent(Agent $agent, $validationCount)
    {
        $this->assertEquals(
            $validationCount,
            $this->validator->validate($agent)->count()
        );
    }
}
