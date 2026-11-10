# Matomo boilerplate

Keep Matomo's version and your own Matomo plugins in Git and deploy them with
Wodby, the way a Drupal or WordPress repository pins its core and modules.

Use it with the [buildable Matomo](https://github.com/wodby/service-matomo-buildable)
service (`matomo-buildable`). For Matomo without your own plugins, where Wodby
keeps Matomo up to date for you, use the
[Matomo](https://github.com/wodby/service-matomo) service instead.

## Matomo's version

`.matomo-version` names the Matomo release to run, for example `5.14.2`. The
build downloads that release from builds.matomo.org, checks its signature and
installs it on [`wodby/matomo-php`](https://github.com/wodby/matomo-php), which
brings PHP, Apache and Wodby's setup. To upgrade Matomo, change the version and
deploy: the deployment updates Matomo's database.

Matomo 5 releases are supported. The file is required: the build fails
without it.

You decide when to upgrade, so watch
[Matomo's releases](https://matomo.org/changelog/) for security fixes.

## Adding a plugin

Put each plugin in its own directory under `plugins/`, named like the plugin:

```
plugins/
  MyPlugin/
    plugin.json
    MyPlugin.php
```

On every deployment Wodby:

- installs Matomo on the first deployment, or updates its database;
- activates every plugin in `plugins/`;
- deactivates plugins you removed from `plugins/` since the last deployment.

The build fails if a directory in `plugins/` has no `plugin.json`, or has the
name of one of Matomo's own plugins.

## Marketplace plugins

Plugins from the Matomo Marketplace don't belong here. Install them from
Matomo's administration: Wodby keeps them in the files storage, where they
survive deployments.

## Files

| Path | Purpose |
| --- | --- |
| `.matomo-version` | The Matomo release to run |
| `plugins/` | Your Matomo plugins |
| `.wodby/pipeline.yml` | The Wodby CI pipeline that builds and deploys the image |
| `.dockerignore` | Files left out of the image |
