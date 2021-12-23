<?php

namespace LaravelAzMonitor\Contracts;

enum SeverityLevel: int {

    case Verbose = 0;
    case Information = 1;
    case Warning = 2;
    case Error = 3;
    case Critical = 4;

}

enum DataPointType: int {

    case Measurement = 0;
    case Aggregation = 1;

}
