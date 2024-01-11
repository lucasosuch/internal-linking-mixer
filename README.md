
# Internal Linking Mixer

### Overview

Internal Linking Mixer is a PHP library designed for processing and transforming text files with a focus on internal linking strategies. It offers functionalities to parse different file types, transform text based on specific preferences, and generate text with embedded internal links.

### Features

- File Parsing: Supports parsing of storage and cloud files.
- File Management: Implements a FileManagerFactory to handle different file reader types.
- Text Transformation: Provides a TextWithInternalLinkingGenerator to transform text with internal links.
- Custom Exceptions: Includes custom exceptions like CSVFileNotParsedException, FileReaderNotFoundException, and TextTransformStrategyNotFoundException for better error handling.

### Usage

```
$internalLinkingMixer = new InternalLinkingMixer();
$text = $internalLinkingMixer
    ->parseStorageFile('path/to/file.csv', ';')
    ->generate()
    ->get();
```

### Testing

The library includes PHPUnit tests for various components, ensuring reliability and robustness.

### License

This project is licensed under the MIT License. See the LICENSE file for more details.
