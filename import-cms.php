<?php
define('BASE_URL', 'https://website.com.br/admin');
define('API_TOKEN', 'token');

function getData($url)
{
    $result = json_decode(file_get_contents($url), true);
    return $result['entries'];
}

function getModuleData($collection)
{
    $url = BASE_URL . '/api/collections/get/' . $collection . '/?token=' . API_TOKEN . '&d=true';
    return getData($url);
}

function getComponentData($singleton)
{
    $url = BASE_URL . '/api/singletons/get/' . $singleton . '/?token=' . API_TOKEN . '&d=true';
    return json_decode(file_get_contents($url), true);
}

function getImage($data)
{
    return BASE_URL . '/storage/uploads' . $data['path'];
}

function getImageStyle($name, $data)
{
    foreach ($data['styles'] as $style) {
        if ($style['style'] == $name) {
            $result = BASE_URL . $style['path'];
        }
    }
    return $result;
}
function printr($data, $stop=false){
    echo '<pre>'.print_r($data).'</pre>';
    if($stop) exit();
}