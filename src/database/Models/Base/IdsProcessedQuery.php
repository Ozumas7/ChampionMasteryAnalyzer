<?php

namespace Kolter\DataBase\Models\Base;

use \Exception;
use \PDO;
use Kolter\DataBase\Models\IdsProcessed as ChildIdsProcessed;
use Kolter\DataBase\Models\IdsProcessedQuery as ChildIdsProcessedQuery;
use Kolter\DataBase\Models\Map\IdsProcessedTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'idsprocessed' table.
 *
 * 
 *
 * @method     ChildIdsProcessedQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildIdsProcessedQuery orderByLastindex($order = Criteria::ASC) Order by the lastindex column
 * @method     ChildIdsProcessedQuery orderByUpdateAt($order = Criteria::ASC) Order by the update_at column
 *
 * @method     ChildIdsProcessedQuery groupById() Group by the id column
 * @method     ChildIdsProcessedQuery groupByLastindex() Group by the lastindex column
 * @method     ChildIdsProcessedQuery groupByUpdateAt() Group by the update_at column
 *
 * @method     ChildIdsProcessedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildIdsProcessedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildIdsProcessedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildIdsProcessedQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildIdsProcessedQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildIdsProcessedQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildIdsProcessed findOne(ConnectionInterface $con = null) Return the first ChildIdsProcessed matching the query
 * @method     ChildIdsProcessed findOneOrCreate(ConnectionInterface $con = null) Return the first ChildIdsProcessed matching the query, or a new ChildIdsProcessed object populated from the query conditions when no match is found
 *
 * @method     ChildIdsProcessed findOneById(int $id) Return the first ChildIdsProcessed filtered by the id column
 * @method     ChildIdsProcessed findOneByLastindex(int $lastindex) Return the first ChildIdsProcessed filtered by the lastindex column
 * @method     ChildIdsProcessed findOneByUpdateAt(string $update_at) Return the first ChildIdsProcessed filtered by the update_at column *

 * @method     ChildIdsProcessed requirePk($key, ConnectionInterface $con = null) Return the ChildIdsProcessed by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIdsProcessed requireOne(ConnectionInterface $con = null) Return the first ChildIdsProcessed matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIdsProcessed requireOneById(int $id) Return the first ChildIdsProcessed filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIdsProcessed requireOneByLastindex(int $lastindex) Return the first ChildIdsProcessed filtered by the lastindex column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildIdsProcessed requireOneByUpdateAt(string $update_at) Return the first ChildIdsProcessed filtered by the update_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildIdsProcessed[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildIdsProcessed objects based on current ModelCriteria
 * @method     ChildIdsProcessed[]|ObjectCollection findById(int $id) Return ChildIdsProcessed objects filtered by the id column
 * @method     ChildIdsProcessed[]|ObjectCollection findByLastindex(int $lastindex) Return ChildIdsProcessed objects filtered by the lastindex column
 * @method     ChildIdsProcessed[]|ObjectCollection findByUpdateAt(string $update_at) Return ChildIdsProcessed objects filtered by the update_at column
 * @method     ChildIdsProcessed[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class IdsProcessedQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Kolter\DataBase\Models\Base\IdsProcessedQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mastery', $modelName = '\\Kolter\\DataBase\\Models\\IdsProcessed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildIdsProcessedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildIdsProcessedQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildIdsProcessedQuery) {
            return $criteria;
        }
        $query = new ChildIdsProcessedQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildIdsProcessed|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(IdsProcessedTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = IdsProcessedTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildIdsProcessed A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, lastindex, update_at FROM idsprocessed WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildIdsProcessed $obj */
            $obj = new ChildIdsProcessed();
            $obj->hydrate($row);
            IdsProcessedTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildIdsProcessed|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildIdsProcessedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(IdsProcessedTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildIdsProcessedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(IdsProcessedTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIdsProcessedQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(IdsProcessedTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(IdsProcessedTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IdsProcessedTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the lastindex column
     *
     * Example usage:
     * <code>
     * $query->filterByLastindex(1234); // WHERE lastindex = 1234
     * $query->filterByLastindex(array(12, 34)); // WHERE lastindex IN (12, 34)
     * $query->filterByLastindex(array('min' => 12)); // WHERE lastindex > 12
     * </code>
     *
     * @param     mixed $lastindex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIdsProcessedQuery The current query, for fluid interface
     */
    public function filterByLastindex($lastindex = null, $comparison = null)
    {
        if (is_array($lastindex)) {
            $useMinMax = false;
            if (isset($lastindex['min'])) {
                $this->addUsingAlias(IdsProcessedTableMap::COL_LASTINDEX, $lastindex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastindex['max'])) {
                $this->addUsingAlias(IdsProcessedTableMap::COL_LASTINDEX, $lastindex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IdsProcessedTableMap::COL_LASTINDEX, $lastindex, $comparison);
    }

    /**
     * Filter the query on the update_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateAt('2011-03-14'); // WHERE update_at = '2011-03-14'
     * $query->filterByUpdateAt('now'); // WHERE update_at = '2011-03-14'
     * $query->filterByUpdateAt(array('max' => 'yesterday')); // WHERE update_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updateAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildIdsProcessedQuery The current query, for fluid interface
     */
    public function filterByUpdateAt($updateAt = null, $comparison = null)
    {
        if (is_array($updateAt)) {
            $useMinMax = false;
            if (isset($updateAt['min'])) {
                $this->addUsingAlias(IdsProcessedTableMap::COL_UPDATE_AT, $updateAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateAt['max'])) {
                $this->addUsingAlias(IdsProcessedTableMap::COL_UPDATE_AT, $updateAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IdsProcessedTableMap::COL_UPDATE_AT, $updateAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildIdsProcessed $idsProcessed Object to remove from the list of results
     *
     * @return $this|ChildIdsProcessedQuery The current query, for fluid interface
     */
    public function prune($idsProcessed = null)
    {
        if ($idsProcessed) {
            $this->addUsingAlias(IdsProcessedTableMap::COL_ID, $idsProcessed->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the idsprocessed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IdsProcessedTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            IdsProcessedTableMap::clearInstancePool();
            IdsProcessedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(IdsProcessedTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(IdsProcessedTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            IdsProcessedTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            IdsProcessedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // IdsProcessedQuery
