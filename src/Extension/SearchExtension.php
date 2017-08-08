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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vainyl\Core\Extension\AbstractExtension;
use Vainyl\Core\Extension\AbstractFrameworkExtension;

/**
 * Class SearchExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SearchExtension extends AbstractFrameworkExtension
{
    /**
     * @inheritDoc
     */
    public function getCompilerPasses(): array
    {
        return [new IndexCompilerPass()];
    }

    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container): AbstractExtension
    {
        parent::load($configs, $container);

        $configuration = new SearchConfiguration();
        $searchConfig = $this->processConfiguration($configuration, $configs);
        if (false === $searchConfig['enabled']) {
            return $this;
        }

        $container->setAlias('database.index', 'database.' . $searchConfig['database']);

        return $this;
    }
}