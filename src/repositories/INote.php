<?php

interface INote
{

    public function createNote( string $title, string $detail ) : int;
    public function allNote() : array;

}