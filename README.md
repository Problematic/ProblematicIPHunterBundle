This bundle is meant to solve a specific problem: monitoring traffic in the form of logging the IP, request URI and profiler token (if any) of each request that hits your application.

### Todo

* More flexible configuration options
* ODM / Propel support
* Better reports (i.e., something more than a single page with every log ever dumped to it)
* Finer-grained control of what kind of requests to log (skip admin requests, or profiler pages, for example)

## Get it...

    // deps
    [ProblematicIPHunterBundle]
        git=git://github.com/Problematic/ProblematicIPHunterBundle.git
        target=bundles/Problematic/IPHunterBundle
        
    // autoload.php
    $loader->registerNamespaces(array(
        // ...
        'Problematic' => __DIR__.'/../vendor/bundles',
        // ...
    ));
    
    // AppKernel.php
    $bundles = array(
        // ...
        new Problematic\IPHunterBundle\ProblematicIPHunterBundle(),
        // ...
    );
    
## Map it...

    namespace Acme\VendorBundle\Entity\HunterLog;
    
    use Problematic\IPHunterBundle\Entity\HunterLog as BaseHunterLog;
    use Doctrine\ORM\Mapping as ORM;
    
    /**
     * @ORM\Entity
     */
    class HunterLog extends BaseHunterLog
    {
    
        /**
         * @ORM\Id @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        protected $id;
    
    }
    
    // config.yml
    problematic_ip_hunter:
        model:
            class:
                log: Acme\VendorBundle\Entity\HunterLog
                
## Import it...

    // app/routing.yml
    problematic_ip_hunter:
        resource: "@ProblematicIPHunterBundle/Resources/config/routing.yml"
        prefix: /admin/iphunter
        
**Note**: You can mount the bundle under whatever prefix you'd like, but it's probably best to mount it somewhere restricted by access control
    
## ... and go

### A few last things

The reports for the bundle were created using [Twitter Bootstrap](http://twitter.github.com/bootstrap/). You can probably make them work for you if you're not using it.