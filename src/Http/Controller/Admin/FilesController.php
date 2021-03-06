<?php namespace Anomaly\FilesModule\Http\Controller\Admin;

use Anomaly\FilesModule\Disk\Contract\DiskRepositoryInterface;
use Anomaly\FilesModule\File\Form\FileFormBuilder;
use Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class FilesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FilesModule\Http\Controller\Admin
 */
class FilesController extends AdminController
{

    /**
     * Return the form to upload files.
     *
     * @param FolderRepositoryInterface $folders
     * @param DiskRepositoryInterface   $disks
     * @param FileFormBuilder           $form
     * @param                           $disk
     * @param null                      $path
     * @return Response
     */
    public function upload(
        FolderRepositoryInterface $folders,
        DiskRepositoryInterface $disks,
        FileFormBuilder $form,
        $disk,
        $path = null
    ) {
        $form->setDisk($disk = $disks->findBySlug($disk));

        if ($path && $folder = $folders->findByPath($path, $disk)) {
            $form->setFolder($folder);
        }

        return $form->render();
    }
}
