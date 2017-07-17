<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Psr7;

    $stream = Psr7\stream_for('this is a sample string data');
    echo $stream . "\r\n";

    echo "Size: " . $stream->getSize() . "\r\n";
    echo "Is readable: " . $stream->isReadable() . "\r\n";
    echo "Is writable: " . $stream->isWritable() . "\r\n";
    echo "Is seekable: " . $stream->isSeekable() . "\r\n";

    $stream->write('test');
    $stream->rewind();

    // read the first 5 bytes
    echo $stream->read(5) . "\r\n";
    echo $stream->getContents() . "\r\n";
    echo $stream->eof() . "\r\n";