<?php

namespace Librinfo\CoreBundle\Command;

use Symfony\Component\Yaml\Yaml;

trait PatcherConfig
{
    private $config;

    private function loadConfig()
    {
        $configPath = __DIR__ . "/../Tools/Patches/patches.yml";

        $this->config = Yaml::parse(
            file_get_contents($configPath)
        );

        if ($this->config['patches'] == null)
            $this->config['patches'] = [];

        $this->config['paths'] = [
            'patchFilesDir' => __DIR__ . "/../Tools/Patches/patches",
            'rootDir'       => str_replace('/app/..', '', $this->getContainer()->getParameter('kernel.root_dir') . "/.."),
            'configFile'    => $configPath
        ];
    }
}