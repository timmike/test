<?php

/**
 * Description of StickyNotesTable
 *
 * @author Arian Khosravi <arian@bigemployee.com>, <@ArianKhosravi>
 */
// module/StickyNotes/src/StickyNotes/Model/StickyNotesTable.php

namespace DailyExpenses\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;

class UsersTable extends AbstractTableGateway {

  protected $table = 'users';

  public function __construct(Adapter $adapter) {
    $this->adapter = $adapter;
  }

  public function fetchAllRecords()
  {
    $sql = new Sql($this->adapter);
    $select = $sql->select();
    $select->from('dailyexpenses');
    $select->join('dailyexpensestype', 'dailyexpenses.type_id=dailyexpensestype.id');
    $select->join('users', 'dailyexpenses.user_id=users.id');
    $select->order('dailyexpenses.date_created DESC');
    $statement = $sql->prepareStatementForSqlObject($select);
    $result = $statement->execute();
    $res = array();
    for($i=0; $i<$result->count(); $i++){
      $res[] = $result->next();
    }
    return $res;
  }

}