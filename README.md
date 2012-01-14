This bundle is meant to solve a specific problem: monitoring traffic in the form of logging the IP, request URI and profiler token (if any) of each request that hits your application.

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
    
## ... and go