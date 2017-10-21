<?php

namespace Extensions\UserBundle\Command;



class CreateUserCommand {

}

//   protected function configure()
//   {
//     $this->setName('oy:user:create')
//         ->setDescription('Create a user')
//         ->setHelp(<<<EOT
// The <info> oy:user:create</info> command creates a user:
//   <info>php app/console oy:user:create</info>
// This interactive shell will ask you for account, username, email, password and
//  permission for new user.
// EOT
// );
//   }

//   protected function execute(InputInterface $input, OutputInterface $output)
//   {
//     $container = $this->getContainer();
//     $em = $container->get('doctrine.orm.entity_manager');
//     $qHelper = $this->getHelper("question");

//     $accountName = "sony";
//     $question = new Question("Please enter user account [{$accountName}]: ", $accountName );
//     $accountName = $qHelper->ask($input, $output, $question);

//     $account = $em->getRepository('OyCommonBundle:Account')->findOneBy(array('name' => $accountName));

//     if ( is_null($account)) {
//       throw new \Exception('Account with this name already Exist');
//     }

//     $question = new Qeustion("Please Enter FirstNAme ?");
//     $firstName = $qHelper->ask($input, $output, $question);

//     if (empty($firstName)) {
//       throw new \Exception('First name cannot be empty');
//     }
//     //Enter password
//     $question = new Question("Please enter password: ");

//     $userPassword = $qHelper->ask($input, $output, $question);
//     if (empty($userPassword)) {
//         throw new \Exception('Password can not be empty');
//     }

//     //Enter email
//     $question = new Question("Please enter user email: ");

//     $userEmail = $qHelper->ask($input, $output, $question);
//     if (empty($userEmail)) {
//         throw new \Exception('Email can not be empty');
//     }
//     $user = $em->getRepository('OyCommonBundle:User')->findOneBy(['email' => $userEmail]);
//     if (!is_null($user)) {
//         throw new \Exception(sprintf('User with email = %s already exists', $userEmail));
//     }
//     //Choose role
//     $availableRoles = [
//         1 => 'ROLE_SUPER_ADMIN',
//         2 => 'ROLE_ADMIN',
//         3 => 'ROLE_INTERNAL_MARKETER',
//         4 => 'ROLE_EXTERNAL_MARKETER',
//     ];
//     $question = new ChoiceQuestion("Please chose the role: ", $availableRoles);
//     $userRole = $qHelper->ask($input, $output, $question);
//         /** @var $userManipulator UserManipulator */
//     $userManipulator = $container->get('fos_user.util.user_manipulator');
//     /** @var User $user */
//     $user = $userManipulator->create($userEmail, $userPassword, $userEmail, true, false);
//     $user->setFirstName($firstName);
//     $user->addRole($userRole);
//     $user->setAccount($account);
//     $em->flush();
//     $user->setPlainPassword($userPassword);
//     $container->get('event_dispatcher')->dispatch('extensions.user_created', new UserCreatedEvent($user));
//     $output->writeln(
//         sprintf('Created user: <comment>%s</comment> with password: <comment>%s</comment> in account: <comment>%s</comment>', $userEmail, $userPassword, $accountName));
//   }
// }
