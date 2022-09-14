<?php

class Table
{
}

class Application
{

    protected $DBConnection;
    protected $DBRecorder;
    protected $DBQueryBuilder;

    public function __construct(ApplicationFactoryInterface $applicationFactory)
    {
        $this->DBConnection = $applicationFactory->createDBConnection();
        $this->DBRecorder = $applicationFactory->createDBRecorder();
        $this->DBQueryBuilder = $applicationFactory->createDBQueryBuilder();
    }

    public function run()
    {
    }
}

interface DBConnectionInterface
{
};
interface DBRecorderInterface
{
    public function save(Table $table): void;
};
interface DBQueryBuilderInterface
{
    public function query(): array;
};


class MySQLFactoryConnection implements DBConnectionInterface
{
}

class MySQLFactoryRecorder implements DBRecorderInterface
{
    public function save(Table $table): void
    {
    }
}

class MySQLFactoryQueryBuilder implements DBQueryBuilderInterface
{
    public function query(): array
    {
        return [];
    }
}


class PostgreSQLFactoryConnection implements DBConnectionInterface
{
}

class PostgreSQLFactoryRecorder implements DBRecorderInterface
{
    public function save(Table $table): void
    {
    }
}

class PostgreSQLFactoryQueryBuilder implements DBQueryBuilderInterface
{
    public function query(): array
    {
        return [];
    }
}



class OracleFactoryConnection implements DBConnectionInterface
{
}

class OracleFactoryRecorder implements DBRecorderInterface
{
    public function save(Table $table): void
    {
    }
}

class OracleFactoryQueryBuilder implements DBQueryBuilderInterface
{
    public function query(): array
    {
        return [];
    }
}



interface ApplicationFactoryInterface
{

    public function createDBConnection(): DBConnectionInterface;
    public function createDBRecorder(): DBRecorderInterface;
    public function createDBQueryBuilder(): DBQueryBuilderInterface;
}


class MySQLServiceFactory implements ApplicationFactoryInterface
{

    public function createDBConnection(): DBConnectionInterface
    {
        return new MySQLFactoryConnection();
    }

    public function createDBRecorder(): DBRecorderInterface
    {
        return new MySQLFactoryRecorder();
    }

    public function createDBQueryBuilder(): DBQueryBuilderInterface
    {
        return new MySQLFactoryQueryBuilder();
    }
}

class PostgreSQLServiceFactory implements ApplicationFactoryInterface
{

    public function createDBConnection(): DBConnectionInterface
    {
        return new PostgreSQLFactoryConnection();
    }

    public function createDBRecorder(): DBRecorderInterface
    {
        return new PostgreSQLFactoryRecorder();
    }

    public function createDBQueryBuilder(): DBQueryBuilderInterface
    {
        return new PostgreSQLFactoryQueryBuilder();
    }
}

class OracleServiceFactory implements ApplicationFactoryInterface
{

    public function createDBConnection(): DBConnectionInterface
    {
        return new OracleFactoryConnection();
    }

    public function createDBRecorder(): DBRecorderInterface
    {
        return new OracleFactoryRecorder();
    }

    public function createDBQueryBuilder(): DBQueryBuilderInterface
    {
        return new OracleFactoryQueryBuilder();
    }
}

$application = new Application(
    new MySQLServiceFactory()
);

$application = new Application(
    new PostgreSQLServiceFactory()
);

$application = new Application(
    new OracleServiceFactory()
);
