<?php

class Application {

    public function run() : void {
        echo "Run Application!";
    }

}

// eine Anonyme Instanz erstellen und die Methode run aufrufen
( new Application() )->run();
