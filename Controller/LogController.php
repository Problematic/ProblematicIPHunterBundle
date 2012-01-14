<?php

namespace Problematic\IPHunterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Problematic\IPHunterBundle\Model\HunterLogManagerInterface;

class LogController extends Controller
{

    public function indexAction()
    {
        $logs = $this->getLogManager()->findLogs();

        return $this->render('ProblematicIPHunterBundle:Log:index.html.twig', array(
            'logs' => $logs,
        ));
    }

    /**
     * @return HunterLogManagerInterface
     */
    protected function getLogManager()
    {
        return $this->container->get('problematic_ip_hunter.manager.log');
    }

}
