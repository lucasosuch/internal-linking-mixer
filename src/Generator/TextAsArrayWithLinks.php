<?php

namespace InternalLinking\Generator;

class TextAsArrayWithLinks implements TextTransformer
{
    /**
     * @param array $parsedCVSFile
     * @return array
     */
    public function transformText(array $parsedCVSFile): array
    {
        $transformedText = [];
        foreach ($parsedCVSFile as $row) {
            if(!is_array($row)) {
                continue;
            }

            $transformedText[] = $this->transformLine($row);
        }

        return $transformedText;
    }

    /**
     * @param array $row
     * @return array
     */
    private function transformLine(array $row): array
    {
        $targetUrl = $row[0];
        $wordToReplace = $row[1];
        $content = $row[2];
        $urlToAdd = $row[3];

        return [
            'new_content' => preg_replace("/".preg_quote($wordToReplace, "/")."/i", "<a href='{$urlToAdd}'>$0</a>", $content),
            'old_content' => $row[2],
            'target_url' => $targetUrl,
        ];
    }
}
