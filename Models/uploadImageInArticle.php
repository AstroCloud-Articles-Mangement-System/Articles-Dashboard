<?php

use Aws\S3\S3Client;

class uploadImageInArticle
{
    private $_s3;

    public function fileSize($file)
    {

        if ($file > 3000000) {
            print_r("File Size is too large please upload another file");
            return false;
        }
        return true;
    }
    public function fileType($file, $type)
    {
        if (!strstr($file, $type)) {
            print_r("please enter file with image extension like .png .jpg .jpeg");
            return false;
        }
        return true;
    }
    public function set_credentials($key, $secret, $region, $version)
    {
        $this->_s3 = S3Client::factory(
            array(
                'credentials' => array(
                    'key' => $key,
                    'secret' => $secret
                ),
                'region' => $region,
                'version' => $version
            )
        );
    }

    public function upload($object_key)
    {
    //     $file_name = $_FILES["article_image"]["name"];
    //     $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    //     $object_key = uniqid() . "." . $file_extension;
        $result = $this->_s3->putObject([
            'Bucket' => 'articlesysbucket',
            'Key' => $object_key,
            'SourceFile' => $_FILES["article_image"]["tmp_name"],
        ]);
        return $result;
    }

    public function __construct($object_key)
    {
        if (!empty($_FILES)) {
            if ($this->fileType($_FILES["article_image"]["type"], "image") && $this->fileSize($_FILES["article_image"]["size"])) {
                $this->set_credentials(__KEY__, __SECRET__, __REGION__, __VERSION__);
                try {
                    $result = $this->upload($object_key);
                    header('Content-Disposition: inline');
                    $object_url = $result['ObjectURL'];
                    $object_key = ltrim(parse_url($object_url)['path'], '/');
                    $bucket = 'articlesysbucket';
                    $url = $this->_s3->getObjectUrl($bucket, $object_key);
                    echo $url;
                    echo "File Uploaded successfully ^_^";
                    echo "<img src='{$url}' />";
                } catch (Aws\S3\Exception\S3Exception $e) {
                    echo $e->getMessage();
                    echo "Can't Upload this file.";
                }
            }
        }
    }

}


?>