<?php
//
//
//namespace App\Command;
//
//use Symfony\Component\Console\Command\Command;
//use Symfony\Component\Console\Input\InputInterface;
//use Symfony\Component\Console\Output\OutputInterface;
//
//use App\Helpers\helpers;
//
///**
// * Class InsertJsonToDbCommand
// * @package App\Command
// * Консольная команда по импорту  json из фаила в базу данных
// */
//class InsertJsonToDbCommand extends Command
//{
//// the name of the command (the part after "bin/console")
//    protected static $defaultName = 'app:insert-json-to-db';
//
//    protected function configure()
//    {
//        $this->setDescription('Import  json data into DB');
//    }
//
//    protected function execute(InputInterface $input, OutputInterface $output)
//
//    {
//        $start = microtime(true);
//        $data = helpers::getJson();
//        helpers::insertDb($data);
//
//        $output->writeln('Start import json data '
//            . date('Y-m-d H:i:s')
//            . ' on '
//            . round(microtime(true) - $start, 2));
//        return Command::SUCCESS;
//    }
//
//}