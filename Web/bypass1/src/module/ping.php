<?php
$file = fopen("/var/www/html/data/device.txt", "r") or die("Unable to open file!");
$existingData = [];
while (($data = fgetcsv($file, 1000, "|")) !== false) {
    $existingData[] = [$data[0], end($data)];
}
fclose($file);
function Check()
{
    if (preg_match('/ /', $_GET['ip'])) {
        echo "<p class='text-danger'>服务器检测到危险的空格，启动了查杀程序</p>";
        return false;
    } else return true;
}

if (isset($_GET['ip'])) {
    if ($_GET['ip'] !== '') {
        if (Check() !== false) {
            $ip = $_GET['ip'];

            $ipIndex = array_search($ip, array_column($existingData, 0));
            if ($ipIndex !== false) {
                $status = $existingData[$ipIndex][1];
            } else {
                ob_start();
                system("ping -c 2 " . $ip);
                $pingResult = ob_get_clean();
                $status = strpos($pingResult, '2 packets transmitted, 2 packets received, 0% packet loss') !== false ? "在线" : "离线";
                echo $pingResult . "\n";
            }
            echo "系统检测到该设备处于" . $status . "状态";

            if (isValidIP($ip) && $ipIndex === false) {
                $mac = generateMAC();
                $deviceType = "none";
                $deviceName = "none";
                $manufacturer = "none";
                $openPort = "none";
                $file = fopen("data/device.txt", "a") or die("Unable to open file!");
                fputcsv($file, [$ip, $mac, $deviceType, $deviceName, $manufacturer, $openPort, $status], "|");
            }
        }
    } else echo "请输入目标ip";
} else echo "检测ip是否存活";
function isValidIP($ip)
{
    return filter_var($ip, FILTER_VALIDATE_IP) !== false;
}

function generateMAC()
{
    return implode(':', str_split(substr(md5(mt_rand()), 0, 12), 2));
}
