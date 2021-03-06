<?php

/*
 * This file is part of the mingyoung/dingtalk.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace EasyDingTalk\Tests;

use EasyDingTalk\Application;

class ApplicationTest extends TestCase
{
    /** @test */
    public function services()
    {
        $app = new Application();

        $services = [
            'config' => \Overtrue\Http\Support\Collection::class,
            'access_token' => \EasyDingTalk\Kernel\AccessToken::class,
            'client' => \EasyDingTalk\Kernel\Http\Client::class,
            'user' => \EasyDingTalk\User\Client::class,
            'chat' => \EasyDingTalk\Chat\Client::class,
            'department' => \EasyDingTalk\Department\Client::class,
            'report' => \EasyDingTalk\Report\Client::class,
            'role' => \EasyDingTalk\Role\Client::class,
            'microapp' => \EasyDingTalk\Microapp\Client::class,
            'blackboard' => \EasyDingTalk\Blackboard\Client::class,
            'calendar' => \EasyDingTalk\Calendar\Client::class,
            'health' => \EasyDingTalk\Health\Client::class,
        ];

        $this->assertCount(count($services), $app->keys());
        foreach ($services as $name => $service) {
            $this->assertInstanceof($service, $app->{$name});
            $this->assertInstanceof($service, $app[$name]);
        }
    }
}
