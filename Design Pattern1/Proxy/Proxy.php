<?php
interface CommandExecutor
{

    public function runCommand($cmd);
}
class CommandExecutorImpl implements CommandExecutor
{

    public function runCommand($cmd)
    {
        //some heavy implementation
       $v = shell_exec($cmd);
       echo "$v";
        echo  " " . $cmd . " command executed. ";
    }
}
class CommandExecutorProxy implements CommandExecutor
{

    private static $isAdmin;
    private static $executor;

    public function __construct($user, $pwd)
    {
        if (("suman" == $user) && ("suman" ==$pwd)) {
            CommandExecutorProxy::$isAdmin = true;
        }

        CommandExecutorProxy::$executor = new CommandExecutorImpl();
    }
    public function runCommand($cmd)
    {
        if (CommandExecutorProxy::$isAdmin) {
            CommandExecutorProxy::$executor->runCommand($cmd);
        } else {
            if (CommandExecutorProxy::startsWith(trim($cmd),"ls")) {
                echo "rm command is not allowed for non-admin users.";
            } else {
                CommandExecutorProxy::$executor->runCommand($cmd);
            }
        }
    }
    public static function startsWith($a,$b)
    {
        for ($i=0; $i < count($b) ; $i++) {
            echo $a;
            echo $b;
            if($a[$i] != $b[$i]){
                return 1;
            }
            return 0;
        }
    }
}
class ProxyPatternTest
{

    public static function main()
    {
        echo "Enter the user name :";
        $name = readline();
        echo "Enter the password :";
        $password = readline();
        $executor = new CommandExecutorProxy($name,$password);
        echo "Enter the command to be executed : ";
        $command = readline(); 
        $executor -> runCommand($command);
    }
}
$ref = new ProxyPatternTest();
$ref->main();
