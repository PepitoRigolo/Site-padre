<?php
namespace App\Attachment;

use App\Model\Category;
use Intervention\Image\ImageManager;

class CategoryAttachment {

    const DIRECTORY = UPLOAD_PATH.DIRECTORY_SEPARATOR.'categories';

    public static function upload(Category $category){
        $image = $category->getImage();
        
        if(empty($image || $category->shouldUpload()===false)){
            return;
        }
        $directory = self::DIRECTORY;
        if(file_exists($directory) === false){
            mkdir($directory, 0777, true);
        }
        if(!empty($category->getOldImage())){
            $formats=['small', 'large'];
            foreach($formats as $format){
                $oldFile = $directory.DIRECTORY_SEPARATOR.$category->getOldImage().'_'.$format.'.jpg';
                if(file_exists($oldFile)){      
                    unlink($oldFile);
                }
            }
        }
        $filename=uniqid("", true);
        $manager= new ImageManager(['driver'=>'gd']);
        $manager
            ->make($image)
            ->fit(350, 200)
            ->save($directory.DIRECTORY_SEPARATOR.$filename.'_small.jpg');
        $manager
            ->make($image)
            ->resize(1280, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($directory.DIRECTORY_SEPARATOR.$filename.'_large.jpg');
            $category->setImage($filename);
    }

    public static function detach (Category $category)
    {
        if(!empty($category->getImage())){
            $formats=['small', 'large'];
            foreach($formats as $format){
                $file = self::DIRECTORY.DIRECTORY_SEPARATOR.$category->getImage().'_'.$format.'.jpg';
                
                if(file_exists($file)){      
                    unlink($file);
                }
            }
        }
    }
}