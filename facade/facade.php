<?php

// Subsystem classes
class Database {
    public function connect() {
        echo "Connecting to database...\n";
    }
    
    public function query($sql) {
        echo "Executing query: $sql\n";
    }
}

class Cache {
    public function set($key, $value) {
        echo "Setting cache: $key\n";
    }
    
    public function get($key) {
        echo "Getting cache: $key\n";
    }
}

class Logger {
    public function log($message) {
        echo "Logging: $message\n";
    }
}

// Facade
class ApplicationFacade {
    private Database $database;
    private Cache $cache;
    private Logger $logger;
    
    public function __construct() {
        $this->database = new Database();
        $this->cache = new Cache();
        $this->logger = new Logger();
    }
    
    public function getUserData($userId) {
        $this->logger->log("Fetching user $userId");
        $this->cache->get("user_$userId");
        $this->database->connect();
        $this->database->query("SELECT * FROM users WHERE id = $userId");
        $this->cache->set("user_$userId", "user_data");
        return "User data for $userId";
    }
}

// Usage
$app = new ApplicationFacade();
echo $app->getUserData(1);
