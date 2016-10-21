# Silex Router Provider 

[![Build Status](https://travis-ci.org/SilexFriends/Router.svg?branch=master)](https://travis-ci.org/SilexFriends/Router) 
[![Code Climate](https://codeclimate.com/github/SilexFriends/Header/badges/gpa.svg)](https://codeclimate.com/github/SilexFriends/Header)
[![Test Coverage](https://codeclimate.com/github/SilexFriends/Header/badges/coverage.svg)](https://codeclimate.com/github/SilexFriends/Header/coverage)
[![Issue Count](https://codeclimate.com/github/SilexFriends/Header/badges/issue_count.svg)](https://codeclimate.com/github/SilexFriends/Header)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/7b8ed0fc-2f5a-4e6f-84fd-030430a3482e/mini.png)](https://insight.sensiolabs.com/projects/7b8ed0fc-2f5a-4e6f-84fd-030430a3482e)
[![Dependency Status](https://www.versioneye.com/user/projects/55ddde652383e9002500006d/badge.svg?style=flat)](https://www.versioneye.com/user/projects/55ddde652383e9002500006d)
[![Codacy Badge](https://api.codacy.com/project/badge/grade/d4a0c1b40cdd4c3da696cfcf4e5c81ad)](https://www.codacy.com/app/mrprompt/silex-router-provider)

Define routes for application with YAML files.

## Install

```
composer require mrprompt/silex-router-provider
```

## Usage

```
use SilexFriends\Router\Router as RouterServiceProvider;

$app->register(new RouterServiceProvider(__DIR__ . DS . 'config' . DS . 'routes' . DS . 'routes.yml'));

```

Configuration files

```
# routes.yml
# http://symfony.com/doc/current/components/routing/introduction.html
home:
    path: /
    defaults: { _controller: 'Controller\Home::get' }
    methods: [GET]

user:
    prefix: /user
    resource: routes.user.yml
```

```
# routes.user.yml
# http://symfony.com/doc/current/components/routing/introduction.html
user.home:
    path: /
    defaults: { _controller: 'Controller\User::get' }
    methods: [GET]
```

## Testing

Just run *phpunit* without parameters

```
phpunit
```
