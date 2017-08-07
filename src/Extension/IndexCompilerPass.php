<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   Search
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vainyl\Search\Extension;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Vainyl\Core\Exception\MissingRequiredServiceException;

/**
 * Class IndexCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class IndexCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('search.index.storage')) {
            throw new MissingRequiredServiceException($container, 'search.index.storage');
        }

        $storageDefinition = $container->findDefinition('search.index.storage');
        foreach ($container->findTaggedServiceIds('search.index') as $id => $tags) {
            $storageDefinition
                ->addMethodCall('addIndex', new Reference($id));
        }
    }
}