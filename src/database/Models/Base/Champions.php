<?php

namespace Kolter\DataBase\Models\Base;

use \DateTime;
use \Exception;
use \PDO;
use Kolter\DataBase\Models\ChampionsQuery as ChildChampionsQuery;
use Kolter\DataBase\Models\Map\ChampionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'champions' table.
 *
 * 
 *
* @package    propel.generator.Kolter.DataBase.Models.Base
*/
abstract class Champions implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Kolter\\DataBase\\Models\\Map\\ChampionsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     * 
     * @var        string
     */
    protected $id;

    /**
     * The value for the championid field.
     * 
     * @var        int
     */
    protected $championid;

    /**
     * The value for the winratio field.
     * 
     * @var        int
     */
    protected $winratio;

    /**
     * The value for the totalsessionsplayed field.
     * 
     * @var        int
     */
    protected $totalsessionsplayed;

    /**
     * The value for the totalsessionswon field.
     * 
     * @var        int
     */
    protected $totalsessionswon;

    /**
     * The value for the totalsessionslost field.
     * 
     * @var        int
     */
    protected $totalsessionslost;

    /**
     * The value for the totalchampionkills field.
     * 
     * @var        int
     */
    protected $totalchampionkills;

    /**
     * The value for the totalassists field.
     * 
     * @var        int
     */
    protected $totalassists;

    /**
     * The value for the totaldeathspersession field.
     * 
     * @var        int
     */
    protected $totaldeathspersession;

    /**
     * The value for the totalgoldearned field.
     * 
     * @var        int
     */
    protected $totalgoldearned;

    /**
     * The value for the totaldamagedealt field.
     * 
     * @var        int
     */
    protected $totaldamagedealt;

    /**
     * The value for the totaldamagetaken field.
     * 
     * @var        int
     */
    protected $totaldamagetaken;

    /**
     * The value for the points field.
     * 
     * @var        int
     */
    protected $points;

    /**
     * The value for the summonerid field.
     * 
     * @var        int
     */
    protected $summonerid;

    /**
     * The value for the update_at field.
     * 
     * @var        DateTime
     */
    protected $update_at;

    /**
     * The value for the region field.
     * 
     * @var        string
     */
    protected $region;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Kolter\DataBase\Models\Base\Champions object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Champions</code> instance.  If
     * <code>obj</code> is an instance of <code>Champions</code>, delegates to
     * <code>equals(Champions)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Champions The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));
        
        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }
        
        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     * 
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [championid] column value.
     * 
     * @return int
     */
    public function getChampionid()
    {
        return $this->championid;
    }

    /**
     * Get the [winratio] column value.
     * 
     * @return int
     */
    public function getWinratio()
    {
        return $this->winratio;
    }

    /**
     * Get the [totalsessionsplayed] column value.
     * 
     * @return int
     */
    public function getTotalsessionsplayed()
    {
        return $this->totalsessionsplayed;
    }

    /**
     * Get the [totalsessionswon] column value.
     * 
     * @return int
     */
    public function getTotalsessionswon()
    {
        return $this->totalsessionswon;
    }

    /**
     * Get the [totalsessionslost] column value.
     * 
     * @return int
     */
    public function getTotalsessionslost()
    {
        return $this->totalsessionslost;
    }

    /**
     * Get the [totalchampionkills] column value.
     * 
     * @return int
     */
    public function getTotalchampionkills()
    {
        return $this->totalchampionkills;
    }

    /**
     * Get the [totalassists] column value.
     * 
     * @return int
     */
    public function getTotalassists()
    {
        return $this->totalassists;
    }

    /**
     * Get the [totaldeathspersession] column value.
     * 
     * @return int
     */
    public function getTotaldeathspersession()
    {
        return $this->totaldeathspersession;
    }

    /**
     * Get the [totalgoldearned] column value.
     * 
     * @return int
     */
    public function getTotalgoldearned()
    {
        return $this->totalgoldearned;
    }

    /**
     * Get the [totaldamagedealt] column value.
     * 
     * @return int
     */
    public function getTotaldamagedealt()
    {
        return $this->totaldamagedealt;
    }

    /**
     * Get the [totaldamagetaken] column value.
     * 
     * @return int
     */
    public function getTotaldamagetaken()
    {
        return $this->totaldamagetaken;
    }

    /**
     * Get the [points] column value.
     * 
     * @return int
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Get the [summonerid] column value.
     * 
     * @return int
     */
    public function getSummonerid()
    {
        return $this->summonerid;
    }

    /**
     * Get the [optionally formatted] temporal [update_at] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdateAt($format = NULL)
    {
        if ($format === null) {
            return $this->update_at;
        } else {
            return $this->update_at instanceof \DateTimeInterface ? $this->update_at->format($format) : null;
        }
    }

    /**
     * Get the [region] column value.
     * 
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param string $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [championid] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setChampionid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->championid !== $v) {
            $this->championid = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_CHAMPIONID] = true;
        }

        return $this;
    } // setChampionid()

    /**
     * Set the value of [winratio] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setWinratio($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->winratio !== $v) {
            $this->winratio = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_WINRATIO] = true;
        }

        return $this;
    } // setWinratio()

    /**
     * Set the value of [totalsessionsplayed] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setTotalsessionsplayed($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->totalsessionsplayed !== $v) {
            $this->totalsessionsplayed = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_TOTALSESSIONSPLAYED] = true;
        }

        return $this;
    } // setTotalsessionsplayed()

    /**
     * Set the value of [totalsessionswon] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setTotalsessionswon($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->totalsessionswon !== $v) {
            $this->totalsessionswon = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_TOTALSESSIONSWON] = true;
        }

        return $this;
    } // setTotalsessionswon()

    /**
     * Set the value of [totalsessionslost] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setTotalsessionslost($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->totalsessionslost !== $v) {
            $this->totalsessionslost = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_TOTALSESSIONSLOST] = true;
        }

        return $this;
    } // setTotalsessionslost()

    /**
     * Set the value of [totalchampionkills] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setTotalchampionkills($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->totalchampionkills !== $v) {
            $this->totalchampionkills = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_TOTALCHAMPIONKILLS] = true;
        }

        return $this;
    } // setTotalchampionkills()

    /**
     * Set the value of [totalassists] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setTotalassists($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->totalassists !== $v) {
            $this->totalassists = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_TOTALASSISTS] = true;
        }

        return $this;
    } // setTotalassists()

    /**
     * Set the value of [totaldeathspersession] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setTotaldeathspersession($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->totaldeathspersession !== $v) {
            $this->totaldeathspersession = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_TOTALDEATHSPERSESSION] = true;
        }

        return $this;
    } // setTotaldeathspersession()

    /**
     * Set the value of [totalgoldearned] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setTotalgoldearned($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->totalgoldearned !== $v) {
            $this->totalgoldearned = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_TOTALGOLDEARNED] = true;
        }

        return $this;
    } // setTotalgoldearned()

    /**
     * Set the value of [totaldamagedealt] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setTotaldamagedealt($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->totaldamagedealt !== $v) {
            $this->totaldamagedealt = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_TOTALDAMAGEDEALT] = true;
        }

        return $this;
    } // setTotaldamagedealt()

    /**
     * Set the value of [totaldamagetaken] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setTotaldamagetaken($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->totaldamagetaken !== $v) {
            $this->totaldamagetaken = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_TOTALDAMAGETAKEN] = true;
        }

        return $this;
    } // setTotaldamagetaken()

    /**
     * Set the value of [points] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setPoints($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->points !== $v) {
            $this->points = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_POINTS] = true;
        }

        return $this;
    } // setPoints()

    /**
     * Set the value of [summonerid] column.
     * 
     * @param int $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setSummonerid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->summonerid !== $v) {
            $this->summonerid = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_SUMMONERID] = true;
        }

        return $this;
    } // setSummonerid()

    /**
     * Sets the value of [update_at] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setUpdateAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->update_at !== null || $dt !== null) {
            if ($this->update_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->update_at->format("Y-m-d H:i:s.u")) {
                $this->update_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ChampionsTableMap::COL_UPDATE_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdateAt()

    /**
     * Set the value of [region] column.
     * 
     * @param string $v new value
     * @return $this|\Kolter\DataBase\Models\Champions The current object (for fluent API support)
     */
    public function setRegion($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->region !== $v) {
            $this->region = $v;
            $this->modifiedColumns[ChampionsTableMap::COL_REGION] = true;
        }

        return $this;
    } // setRegion()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ChampionsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ChampionsTableMap::translateFieldName('Championid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->championid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ChampionsTableMap::translateFieldName('Winratio', TableMap::TYPE_PHPNAME, $indexType)];
            $this->winratio = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ChampionsTableMap::translateFieldName('Totalsessionsplayed', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalsessionsplayed = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ChampionsTableMap::translateFieldName('Totalsessionswon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalsessionswon = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ChampionsTableMap::translateFieldName('Totalsessionslost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalsessionslost = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ChampionsTableMap::translateFieldName('Totalchampionkills', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalchampionkills = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ChampionsTableMap::translateFieldName('Totalassists', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalassists = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ChampionsTableMap::translateFieldName('Totaldeathspersession', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totaldeathspersession = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ChampionsTableMap::translateFieldName('Totalgoldearned', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totalgoldearned = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ChampionsTableMap::translateFieldName('Totaldamagedealt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totaldamagedealt = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ChampionsTableMap::translateFieldName('Totaldamagetaken', TableMap::TYPE_PHPNAME, $indexType)];
            $this->totaldamagetaken = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ChampionsTableMap::translateFieldName('Points', TableMap::TYPE_PHPNAME, $indexType)];
            $this->points = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ChampionsTableMap::translateFieldName('Summonerid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->summonerid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ChampionsTableMap::translateFieldName('UpdateAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->update_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : ChampionsTableMap::translateFieldName('Region', TableMap::TYPE_PHPNAME, $indexType)];
            $this->region = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 16; // 16 = ChampionsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Kolter\\DataBase\\Models\\Champions'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChampionsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildChampionsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Champions::setDeleted()
     * @see Champions::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildChampionsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChampionsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ChampionsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ChampionsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_CHAMPIONID)) {
            $modifiedColumns[':p' . $index++]  = 'championid';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_WINRATIO)) {
            $modifiedColumns[':p' . $index++]  = 'winratio';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALSESSIONSPLAYED)) {
            $modifiedColumns[':p' . $index++]  = 'totalSessionsPlayed';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALSESSIONSWON)) {
            $modifiedColumns[':p' . $index++]  = 'totalSessionsWon';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALSESSIONSLOST)) {
            $modifiedColumns[':p' . $index++]  = 'totalSessionsLost';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALCHAMPIONKILLS)) {
            $modifiedColumns[':p' . $index++]  = 'totalChampionKills';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALASSISTS)) {
            $modifiedColumns[':p' . $index++]  = 'totalAssists';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALDEATHSPERSESSION)) {
            $modifiedColumns[':p' . $index++]  = 'totalDeathsPerSession';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALGOLDEARNED)) {
            $modifiedColumns[':p' . $index++]  = 'totalGoldEarned';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALDAMAGEDEALT)) {
            $modifiedColumns[':p' . $index++]  = 'totalDamageDealt';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALDAMAGETAKEN)) {
            $modifiedColumns[':p' . $index++]  = 'totalDamageTaken';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_POINTS)) {
            $modifiedColumns[':p' . $index++]  = 'points';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_SUMMONERID)) {
            $modifiedColumns[':p' . $index++]  = 'summonerid';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_UPDATE_AT)) {
            $modifiedColumns[':p' . $index++]  = 'update_at';
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_REGION)) {
            $modifiedColumns[':p' . $index++]  = 'region';
        }

        $sql = sprintf(
            'INSERT INTO champions (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':                        
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_STR);
                        break;
                    case 'championid':                        
                        $stmt->bindValue($identifier, $this->championid, PDO::PARAM_INT);
                        break;
                    case 'winratio':                        
                        $stmt->bindValue($identifier, $this->winratio, PDO::PARAM_INT);
                        break;
                    case 'totalSessionsPlayed':                        
                        $stmt->bindValue($identifier, $this->totalsessionsplayed, PDO::PARAM_INT);
                        break;
                    case 'totalSessionsWon':                        
                        $stmt->bindValue($identifier, $this->totalsessionswon, PDO::PARAM_INT);
                        break;
                    case 'totalSessionsLost':                        
                        $stmt->bindValue($identifier, $this->totalsessionslost, PDO::PARAM_INT);
                        break;
                    case 'totalChampionKills':                        
                        $stmt->bindValue($identifier, $this->totalchampionkills, PDO::PARAM_INT);
                        break;
                    case 'totalAssists':                        
                        $stmt->bindValue($identifier, $this->totalassists, PDO::PARAM_INT);
                        break;
                    case 'totalDeathsPerSession':                        
                        $stmt->bindValue($identifier, $this->totaldeathspersession, PDO::PARAM_INT);
                        break;
                    case 'totalGoldEarned':                        
                        $stmt->bindValue($identifier, $this->totalgoldearned, PDO::PARAM_INT);
                        break;
                    case 'totalDamageDealt':                        
                        $stmt->bindValue($identifier, $this->totaldamagedealt, PDO::PARAM_INT);
                        break;
                    case 'totalDamageTaken':                        
                        $stmt->bindValue($identifier, $this->totaldamagetaken, PDO::PARAM_INT);
                        break;
                    case 'points':                        
                        $stmt->bindValue($identifier, $this->points, PDO::PARAM_INT);
                        break;
                    case 'summonerid':                        
                        $stmt->bindValue($identifier, $this->summonerid, PDO::PARAM_INT);
                        break;
                    case 'update_at':                        
                        $stmt->bindValue($identifier, $this->update_at ? $this->update_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'region':                        
                        $stmt->bindValue($identifier, $this->region, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ChampionsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getChampionid();
                break;
            case 2:
                return $this->getWinratio();
                break;
            case 3:
                return $this->getTotalsessionsplayed();
                break;
            case 4:
                return $this->getTotalsessionswon();
                break;
            case 5:
                return $this->getTotalsessionslost();
                break;
            case 6:
                return $this->getTotalchampionkills();
                break;
            case 7:
                return $this->getTotalassists();
                break;
            case 8:
                return $this->getTotaldeathspersession();
                break;
            case 9:
                return $this->getTotalgoldearned();
                break;
            case 10:
                return $this->getTotaldamagedealt();
                break;
            case 11:
                return $this->getTotaldamagetaken();
                break;
            case 12:
                return $this->getPoints();
                break;
            case 13:
                return $this->getSummonerid();
                break;
            case 14:
                return $this->getUpdateAt();
                break;
            case 15:
                return $this->getRegion();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Champions'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Champions'][$this->hashCode()] = true;
        $keys = ChampionsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getChampionid(),
            $keys[2] => $this->getWinratio(),
            $keys[3] => $this->getTotalsessionsplayed(),
            $keys[4] => $this->getTotalsessionswon(),
            $keys[5] => $this->getTotalsessionslost(),
            $keys[6] => $this->getTotalchampionkills(),
            $keys[7] => $this->getTotalassists(),
            $keys[8] => $this->getTotaldeathspersession(),
            $keys[9] => $this->getTotalgoldearned(),
            $keys[10] => $this->getTotaldamagedealt(),
            $keys[11] => $this->getTotaldamagetaken(),
            $keys[12] => $this->getPoints(),
            $keys[13] => $this->getSummonerid(),
            $keys[14] => $this->getUpdateAt(),
            $keys[15] => $this->getRegion(),
        );
        if ($result[$keys[14]] instanceof \DateTime) {
            $result[$keys[14]] = $result[$keys[14]]->format('c');
        }
        
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Kolter\DataBase\Models\Champions
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ChampionsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Kolter\DataBase\Models\Champions
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setChampionid($value);
                break;
            case 2:
                $this->setWinratio($value);
                break;
            case 3:
                $this->setTotalsessionsplayed($value);
                break;
            case 4:
                $this->setTotalsessionswon($value);
                break;
            case 5:
                $this->setTotalsessionslost($value);
                break;
            case 6:
                $this->setTotalchampionkills($value);
                break;
            case 7:
                $this->setTotalassists($value);
                break;
            case 8:
                $this->setTotaldeathspersession($value);
                break;
            case 9:
                $this->setTotalgoldearned($value);
                break;
            case 10:
                $this->setTotaldamagedealt($value);
                break;
            case 11:
                $this->setTotaldamagetaken($value);
                break;
            case 12:
                $this->setPoints($value);
                break;
            case 13:
                $this->setSummonerid($value);
                break;
            case 14:
                $this->setUpdateAt($value);
                break;
            case 15:
                $this->setRegion($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = ChampionsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setChampionid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setWinratio($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTotalsessionsplayed($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTotalsessionswon($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTotalsessionslost($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setTotalchampionkills($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setTotalassists($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setTotaldeathspersession($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTotalgoldearned($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setTotaldamagedealt($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTotaldamagetaken($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setPoints($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setSummonerid($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setUpdateAt($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setRegion($arr[$keys[15]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Kolter\DataBase\Models\Champions The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ChampionsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ChampionsTableMap::COL_ID)) {
            $criteria->add(ChampionsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_CHAMPIONID)) {
            $criteria->add(ChampionsTableMap::COL_CHAMPIONID, $this->championid);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_WINRATIO)) {
            $criteria->add(ChampionsTableMap::COL_WINRATIO, $this->winratio);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALSESSIONSPLAYED)) {
            $criteria->add(ChampionsTableMap::COL_TOTALSESSIONSPLAYED, $this->totalsessionsplayed);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALSESSIONSWON)) {
            $criteria->add(ChampionsTableMap::COL_TOTALSESSIONSWON, $this->totalsessionswon);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALSESSIONSLOST)) {
            $criteria->add(ChampionsTableMap::COL_TOTALSESSIONSLOST, $this->totalsessionslost);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALCHAMPIONKILLS)) {
            $criteria->add(ChampionsTableMap::COL_TOTALCHAMPIONKILLS, $this->totalchampionkills);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALASSISTS)) {
            $criteria->add(ChampionsTableMap::COL_TOTALASSISTS, $this->totalassists);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALDEATHSPERSESSION)) {
            $criteria->add(ChampionsTableMap::COL_TOTALDEATHSPERSESSION, $this->totaldeathspersession);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALGOLDEARNED)) {
            $criteria->add(ChampionsTableMap::COL_TOTALGOLDEARNED, $this->totalgoldearned);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALDAMAGEDEALT)) {
            $criteria->add(ChampionsTableMap::COL_TOTALDAMAGEDEALT, $this->totaldamagedealt);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_TOTALDAMAGETAKEN)) {
            $criteria->add(ChampionsTableMap::COL_TOTALDAMAGETAKEN, $this->totaldamagetaken);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_POINTS)) {
            $criteria->add(ChampionsTableMap::COL_POINTS, $this->points);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_SUMMONERID)) {
            $criteria->add(ChampionsTableMap::COL_SUMMONERID, $this->summonerid);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_UPDATE_AT)) {
            $criteria->add(ChampionsTableMap::COL_UPDATE_AT, $this->update_at);
        }
        if ($this->isColumnModified(ChampionsTableMap::COL_REGION)) {
            $criteria->add(ChampionsTableMap::COL_REGION, $this->region);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildChampionsQuery::create();
        $criteria->add(ChampionsTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }
        
    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Kolter\DataBase\Models\Champions (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setId($this->getId());
        $copyObj->setChampionid($this->getChampionid());
        $copyObj->setWinratio($this->getWinratio());
        $copyObj->setTotalsessionsplayed($this->getTotalsessionsplayed());
        $copyObj->setTotalsessionswon($this->getTotalsessionswon());
        $copyObj->setTotalsessionslost($this->getTotalsessionslost());
        $copyObj->setTotalchampionkills($this->getTotalchampionkills());
        $copyObj->setTotalassists($this->getTotalassists());
        $copyObj->setTotaldeathspersession($this->getTotaldeathspersession());
        $copyObj->setTotalgoldearned($this->getTotalgoldearned());
        $copyObj->setTotaldamagedealt($this->getTotaldamagedealt());
        $copyObj->setTotaldamagetaken($this->getTotaldamagetaken());
        $copyObj->setPoints($this->getPoints());
        $copyObj->setSummonerid($this->getSummonerid());
        $copyObj->setUpdateAt($this->getUpdateAt());
        $copyObj->setRegion($this->getRegion());
        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Kolter\DataBase\Models\Champions Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->championid = null;
        $this->winratio = null;
        $this->totalsessionsplayed = null;
        $this->totalsessionswon = null;
        $this->totalsessionslost = null;
        $this->totalchampionkills = null;
        $this->totalassists = null;
        $this->totaldeathspersession = null;
        $this->totalgoldearned = null;
        $this->totaldamagedealt = null;
        $this->totaldamagetaken = null;
        $this->points = null;
        $this->summonerid = null;
        $this->update_at = null;
        $this->region = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ChampionsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
