<?php

// module/Album/conﬁg/module.config.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'Blog\Controller\Blog' => 'Blog\Controller\BlogController',
        ),
    ),
    'di' => array(
        'instance' => array(
            'Zend\View\HelperLoader' => array(
                'parameters' => array(
                'map' => array(
                        'zfcUserIdentity' => 'ZfcUser\View\Helper\ZfcUserIdentity',
                        'zfcUserLoginWidget' => 'ZfcUser\View\Helper\ZfcUserLoginWidget',
                    ),
                ),
            ),
        ),
    ),
    
     // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'blog' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/blog[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Blog',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);
