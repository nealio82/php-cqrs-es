<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class PushNotificationsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('domain:events:spread')
            ->setDescription('Notify all domain events via messaging')
            ->addArgument(
                'exchange-name',
                InputArgument::OPTIONAL,
                'Exchange name to publish events to',
                'php-cqrs-es'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $app = $this->getContainer();

        $notification_service = $app->get('app.domain_notifier');

        $numberOfNotifications =
            $notification_service
                ->getNotifier()
                ->publishNotifications(
                    $input->getArgument('exchange-name')
                );
        $output->writeln(
            sprintf('<comment>%d</comment> <info>notification(s) sent!</info>',
                $numberOfNotifications
            )
        );
    }
}