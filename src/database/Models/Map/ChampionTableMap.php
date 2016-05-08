<?php

namespace Kolter\DataBase\Models\Map;

use Kolter\DataBase\Models\Champion;
use Kolter\DataBase\Models\ChampionQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'champion' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ChampionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Kolter.DataBase.Models.Map.ChampionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'mastery';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'champion';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Kolter\\DataBase\\Models\\Champion';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Kolter.DataBase.Models.Champion';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id field
     */
    const COL_ID = 'champion.id';

    /**
     * the column name for the winratio field
     */
    const COL_WINRATIO = 'champion.winratio';

    /**
     * the column name for the totalSessionsPlayed field
     */
    const COL_TOTALSESSIONSPLAYED = 'champion.totalSessionsPlayed';

    /**
     * the column name for the totalSessionsWon field
     */
    const COL_TOTALSESSIONSWON = 'champion.totalSessionsWon';

    /**
     * the column name for the totalSessionsLost field
     */
    const COL_TOTALSESSIONSLOST = 'champion.totalSessionsLost';

    /**
     * the column name for the totalChampionKills field
     */
    const COL_TOTALCHAMPIONKILLS = 'champion.totalChampionKills';

    /**
     * the column name for the totalAssists field
     */
    const COL_TOTALASSISTS = 'champion.totalAssists';

    /**
     * the column name for the totalDeathsPerSession field
     */
    const COL_TOTALDEATHSPERSESSION = 'champion.totalDeathsPerSession';

    /**
     * the column name for the totalGoldEarned field
     */
    const COL_TOTALGOLDEARNED = 'champion.totalGoldEarned';

    /**
     * the column name for the totalDamageDealt field
     */
    const COL_TOTALDAMAGEDEALT = 'champion.totalDamageDealt';

    /**
     * the column name for the totalDamageTaken field
     */
    const COL_TOTALDAMAGETAKEN = 'champion.totalDamageTaken';

    /**
     * the column name for the points field
     */
    const COL_POINTS = 'champion.points';

    /**
     * the column name for the update_at field
     */
    const COL_UPDATE_AT = 'champion.update_at';

    /**
     * the column name for the entries field
     */
    const COL_ENTRIES = 'champion.entries';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Winratio', 'Totalsessionsplayed', 'Totalsessionswon', 'Totalsessionslost', 'Totalchampionkills', 'Totalassists', 'Totaldeathspersession', 'Totalgoldearned', 'Totaldamagedealt', 'Totaldamagetaken', 'Points', 'UpdateAt', 'Entries', ),
        self::TYPE_CAMELNAME     => array('id', 'winratio', 'totalsessionsplayed', 'totalsessionswon', 'totalsessionslost', 'totalchampionkills', 'totalassists', 'totaldeathspersession', 'totalgoldearned', 'totaldamagedealt', 'totaldamagetaken', 'points', 'updateAt', 'entries', ),
        self::TYPE_COLNAME       => array(ChampionTableMap::COL_ID, ChampionTableMap::COL_WINRATIO, ChampionTableMap::COL_TOTALSESSIONSPLAYED, ChampionTableMap::COL_TOTALSESSIONSWON, ChampionTableMap::COL_TOTALSESSIONSLOST, ChampionTableMap::COL_TOTALCHAMPIONKILLS, ChampionTableMap::COL_TOTALASSISTS, ChampionTableMap::COL_TOTALDEATHSPERSESSION, ChampionTableMap::COL_TOTALGOLDEARNED, ChampionTableMap::COL_TOTALDAMAGEDEALT, ChampionTableMap::COL_TOTALDAMAGETAKEN, ChampionTableMap::COL_POINTS, ChampionTableMap::COL_UPDATE_AT, ChampionTableMap::COL_ENTRIES, ),
        self::TYPE_FIELDNAME     => array('id', 'winratio', 'totalSessionsPlayed', 'totalSessionsWon', 'totalSessionsLost', 'totalChampionKills', 'totalAssists', 'totalDeathsPerSession', 'totalGoldEarned', 'totalDamageDealt', 'totalDamageTaken', 'points', 'update_at', 'entries', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Winratio' => 1, 'Totalsessionsplayed' => 2, 'Totalsessionswon' => 3, 'Totalsessionslost' => 4, 'Totalchampionkills' => 5, 'Totalassists' => 6, 'Totaldeathspersession' => 7, 'Totalgoldearned' => 8, 'Totaldamagedealt' => 9, 'Totaldamagetaken' => 10, 'Points' => 11, 'UpdateAt' => 12, 'Entries' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'winratio' => 1, 'totalsessionsplayed' => 2, 'totalsessionswon' => 3, 'totalsessionslost' => 4, 'totalchampionkills' => 5, 'totalassists' => 6, 'totaldeathspersession' => 7, 'totalgoldearned' => 8, 'totaldamagedealt' => 9, 'totaldamagetaken' => 10, 'points' => 11, 'updateAt' => 12, 'entries' => 13, ),
        self::TYPE_COLNAME       => array(ChampionTableMap::COL_ID => 0, ChampionTableMap::COL_WINRATIO => 1, ChampionTableMap::COL_TOTALSESSIONSPLAYED => 2, ChampionTableMap::COL_TOTALSESSIONSWON => 3, ChampionTableMap::COL_TOTALSESSIONSLOST => 4, ChampionTableMap::COL_TOTALCHAMPIONKILLS => 5, ChampionTableMap::COL_TOTALASSISTS => 6, ChampionTableMap::COL_TOTALDEATHSPERSESSION => 7, ChampionTableMap::COL_TOTALGOLDEARNED => 8, ChampionTableMap::COL_TOTALDAMAGEDEALT => 9, ChampionTableMap::COL_TOTALDAMAGETAKEN => 10, ChampionTableMap::COL_POINTS => 11, ChampionTableMap::COL_UPDATE_AT => 12, ChampionTableMap::COL_ENTRIES => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'winratio' => 1, 'totalSessionsPlayed' => 2, 'totalSessionsWon' => 3, 'totalSessionsLost' => 4, 'totalChampionKills' => 5, 'totalAssists' => 6, 'totalDeathsPerSession' => 7, 'totalGoldEarned' => 8, 'totalDamageDealt' => 9, 'totalDamageTaken' => 10, 'points' => 11, 'update_at' => 12, 'entries' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('champion');
        $this->setPhpName('Champion');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Kolter\\DataBase\\Models\\Champion');
        $this->setPackage('Kolter.DataBase.Models');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('winratio', 'Winratio', 'INTEGER', false, 100, null);
        $this->addColumn('totalSessionsPlayed', 'Totalsessionsplayed', 'INTEGER', false, 100, null);
        $this->addColumn('totalSessionsWon', 'Totalsessionswon', 'INTEGER', false, 100, null);
        $this->addColumn('totalSessionsLost', 'Totalsessionslost', 'INTEGER', false, 100, null);
        $this->addColumn('totalChampionKills', 'Totalchampionkills', 'INTEGER', false, 100, null);
        $this->addColumn('totalAssists', 'Totalassists', 'INTEGER', false, 100, null);
        $this->addColumn('totalDeathsPerSession', 'Totaldeathspersession', 'INTEGER', false, 100, null);
        $this->addColumn('totalGoldEarned', 'Totalgoldearned', 'INTEGER', false, 100, null);
        $this->addColumn('totalDamageDealt', 'Totaldamagedealt', 'INTEGER', false, 100, null);
        $this->addColumn('totalDamageTaken', 'Totaldamagetaken', 'INTEGER', false, 100, null);
        $this->addColumn('points', 'Points', 'INTEGER', false, 100, null);
        $this->addColumn('update_at', 'UpdateAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('entries', 'Entries', 'INTEGER', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }
    
    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ChampionTableMap::CLASS_DEFAULT : ChampionTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Champion object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ChampionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ChampionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ChampionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ChampionTableMap::OM_CLASS;
            /** @var Champion $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ChampionTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ChampionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ChampionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Champion $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ChampionTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ChampionTableMap::COL_ID);
            $criteria->addSelectColumn(ChampionTableMap::COL_WINRATIO);
            $criteria->addSelectColumn(ChampionTableMap::COL_TOTALSESSIONSPLAYED);
            $criteria->addSelectColumn(ChampionTableMap::COL_TOTALSESSIONSWON);
            $criteria->addSelectColumn(ChampionTableMap::COL_TOTALSESSIONSLOST);
            $criteria->addSelectColumn(ChampionTableMap::COL_TOTALCHAMPIONKILLS);
            $criteria->addSelectColumn(ChampionTableMap::COL_TOTALASSISTS);
            $criteria->addSelectColumn(ChampionTableMap::COL_TOTALDEATHSPERSESSION);
            $criteria->addSelectColumn(ChampionTableMap::COL_TOTALGOLDEARNED);
            $criteria->addSelectColumn(ChampionTableMap::COL_TOTALDAMAGEDEALT);
            $criteria->addSelectColumn(ChampionTableMap::COL_TOTALDAMAGETAKEN);
            $criteria->addSelectColumn(ChampionTableMap::COL_POINTS);
            $criteria->addSelectColumn(ChampionTableMap::COL_UPDATE_AT);
            $criteria->addSelectColumn(ChampionTableMap::COL_ENTRIES);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.winratio');
            $criteria->addSelectColumn($alias . '.totalSessionsPlayed');
            $criteria->addSelectColumn($alias . '.totalSessionsWon');
            $criteria->addSelectColumn($alias . '.totalSessionsLost');
            $criteria->addSelectColumn($alias . '.totalChampionKills');
            $criteria->addSelectColumn($alias . '.totalAssists');
            $criteria->addSelectColumn($alias . '.totalDeathsPerSession');
            $criteria->addSelectColumn($alias . '.totalGoldEarned');
            $criteria->addSelectColumn($alias . '.totalDamageDealt');
            $criteria->addSelectColumn($alias . '.totalDamageTaken');
            $criteria->addSelectColumn($alias . '.points');
            $criteria->addSelectColumn($alias . '.update_at');
            $criteria->addSelectColumn($alias . '.entries');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ChampionTableMap::DATABASE_NAME)->getTable(ChampionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ChampionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ChampionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ChampionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Champion or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Champion object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Kolter\DataBase\Models\Champion) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ChampionTableMap::DATABASE_NAME);
            $criteria->add(ChampionTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ChampionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ChampionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ChampionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the champion table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ChampionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Champion or Criteria object.
     *
     * @param mixed               $criteria Criteria or Champion object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Champion object
        }


        // Set the correct dbName
        $query = ChampionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ChampionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ChampionTableMap::buildTableMap();
