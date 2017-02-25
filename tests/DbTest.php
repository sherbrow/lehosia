<?php

class DbTest extends TestCase 
{
    public function testConnection()
    {
        try {
            DB::select('SELECT 1');
        }
        catch (\PDOException $e) {
            $this->fail($e);
        }
    }
    
    /**
     * @depends testConnection
     */
    public function testMigration()
    {
        $this->artisan('migrate');
        $this->assertGreaterThan(0, $this->getMigrationCount(), 'Migrations are expected');
        $this->artisan('migrate:reset');
        $this->assertEquals(0, $this->getMigrationCount());
    }
    
    protected function getMigrationCount()
    {
        return DB::table(config('database.migrations'))->count();;
    }
    
}
