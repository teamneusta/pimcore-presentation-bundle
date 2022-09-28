# PresentationBundle

Allows to create online presentations using reveal-js

## Installation

1. Run `composer require teamneusta/pimcore-presentation-bundle` to install the bundle
2. Enable and _install_ the pimcore bundle to get Document and other Templates \
`bin/console pimcore:bundle:enable NeustaPimcorePresentationBundle` \
`bin/console pimcore:bundle:install NeustaPimcorePresentationBundle`

## Install reveal.js

After the Bundle is installed it is required to manually install reveal-js

```shell
cd vendor/neusta/pimcore-presentation-bundle/Resources/public
curl -OL https://github.com/hakimel/reveal.js/archive/master.zip
unzip master.zip
rm master.zip
```

## Configuration

The Bundle provides a handful of _simple_ Areabricks to create Presentations. When the Bundle is used alongside other Bundles it might lead to Areabrick name collisions or one is just not interested in using the _default_ Bricks. It is possible to disable the included Areabricks using the following configuration

```yaml
neusta_pimcore_presentation:
    bricks: false
```

## Attribution

Icon by <a href="https://www.flaticon.com/free-icons/project" title="project icons">Project icons created by Freepik - Flaticon</a>
