<?php namespace Anomaly\FilesModule\File;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;

/**
 * Class FilePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FilesModule\File
 */
class FilePresenter extends EntryPresenter
{

    /**
     * The decorated object.
     * This is for IDE support.
     *
     * @var FileInterface
     */
    protected $object;

    /**
     * Return the browser link.
     *
     * @return string
     */
    public function browserLink()
    {
        return app('html')->link(
            implode(
                '/',
                array_filter(
                    [
                        'admin',
                        'files',
                        'view',
                        $this->object->getDisk()->getSlug(),
                        $this->object->path()
                    ]
                )
            ),
            $this->object->getName()
        );
    }
}