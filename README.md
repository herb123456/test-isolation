# MariaDB 的 Isolation Level 測試

## Install

1. Clone the project
```
git clone https://github.com/herb123456/test-isolation.git
cd test-isolation
```

2. Composer install
```
composer install
```

3. Create a database

You can use any database management tool to create a database for this test.

or you can follow my step to use mysql command.

```
# mysql -u root
# create database you-database-name;
```

4. Edit DB config
```
vim db_config.php
```

5. Initial test table

change to any level's sub folder
```
cd read_uncommitted
```

then use doctrine command line tool to initial tables
```shell
../vendor/bin/doctrine orm:schema-tool:update --force --dump-sql
```

6. Let's run test script!