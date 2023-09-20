<?php
use \PHPUnit\Framework\TestCase;
class DBTest extends TestCase
{

    public function testDBConnection() {
        $db = new Database();
        $conn = $db->getConnection();
        $this->assertNotNull($conn);
        $this->assertInstanceOf('PDO',  $conn);
        //$db = $this->createMock(Database::class);
    }

    public function testCreateNote() {
        $service = new NoteService();
        $id = $service->createNote("Toplantı -x", "Detay Toplantı -x");
        $this->assertGreaterThan(0, $id);
    }

    public function testAllNote() {
        $service = new NoteService();
        $arr = $service->allNote();
        $this->assertIsArray($arr);
        $this->assertGreaterThan(5, count($arr));
        $title = $arr[0]['title'];
        $this->assertEqualsIgnoringCase('Toplantı', $title);
    }


    public function testCreateNoteMock() {
        $mockNoteService = $this->createMock(NoteService::class);
        $num = $mockNoteService->createNote('X', 'Y');
        $this->assertGreaterThan(0, $num);
        /*
        $mockNoteService
            //->expects(  )
            ->method( 'createNote' )
            ->withAnyParameters('X', 'Y')
            ->with( $this->assertEquals(0, 0));
        */
    }

}