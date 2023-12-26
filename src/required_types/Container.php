<?php

namespace mindplay\benchmarks\required_types;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    /**
     * @var FactoryDefinitionInterface[]
     */
    private array $factories = [];

    /**
     * @var ExtensionDefinitionInterface[][]
     */
    private array $extensions = [];

    /**
     * @var mixed[]
     */
    private array $instances = [];

    public function register(ServiceProviderInterface $provider)
    {
        foreach ($provider->getFactories() as $id => $factory) {
            $this->factories[$id] = $factory;
        }

        foreach ($provider->getExtensions() as $id => $extension) {
            $this->extensions[$id][] = $extension;
        }
    }

    public function get(string $id): mixed
    {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        $factory = $this->factories[$id];

        $instance = $factory->createService($this);

        if (isset($this->extensions[$id])) {
            foreach ($this->extensions[$id] as $extension) {
                $instance = $extension->extendService($this, $instance);
            }
        }

        $this->instances[$id] = $instance;

        return $instance;
    }

    public function has(string $id): bool
    {
        return isset($this->factories[$id]);
    }
}
