<?php


namespace ybs\printThermal\PrintConnectors;




use Mike42\Escpos\PrintConnectors\PrintConnector;
use ybs\printThermal\PrintConnectors\Platform;

final class YbsPrintConnector implements PrintConnector
{
    /**
     * @var array $buffer
     *  Buffer of accumilated data.
     */
    private $buffer;

    /**
     * @var string data which the printer will provide on next read
     */
    private $readData;
	
	private $platform;
	private $localserver;
	private $printer_name;
	private $device;

    /**
     * Create new print connector
     */
    public function __construct($config)
    {
        ob_start();
        $this->buffer = [];
		$this->platform = @$config['platform'];
		$this->localserver =  @$config['localserver'];
		$this->printer_name = @$config['printer_name'];
		
		
		
    }

    public function clear()
    {
		
        $this->buffer = [];
    }

    public function __destruct()
    {
        if ($this->buffer !== null) {
            trigger_error("Print connector was not finalized. Did you forget to close the printer?", E_USER_NOTICE);
        }
    }

    public function finalize()
    {
        ob_end_clean();
		
		if($this->platform==Platform::CLIENT_ANDROID){
			 echo "intent:base64," . base64_encode($this->getData()) . "#Intent;scheme=rawbt;package=ru.a402d.rawbtprinter;end;";
		}else{
			 echo $this->localserver . "/api/Public_Access/printDirect?data=". base64_encode($this->getData()) . "&device=" . base64_encode($this->printer_name) ;
		}
		
        $this->buffer = null;
    }
	
	public function finalizeDirect()
    {
        ob_end_clean();
		
		
        $this->buffer = null;
    }



    /**
     * @return string Get the accumulated data that has been sent to this buffer.
     */
    public function getData()
    {
        return implode($this->buffer);
    }

    /**
     * {@inheritDoc}
     * @see PrintConnector::read()
     */
    public function read($len)
    {
        return $len >= strlen($this->readData) ? $this->readData : substr($this->readData, 0, $len);
    }

    public function write($data)
    {
        $this->buffer[] = $data;
    }
}
