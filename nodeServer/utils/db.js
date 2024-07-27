'use strict';

/**
 * get db data from .env file
 * connect to database
 */

const path   = require('path'),
      mysql  = require('mysql2'),
      config = require('config'),
      {info} = require("./constVariables");

class Db {
    constructor() {
        this.connection     = mysql.createPool({
            connectionLimit : 100,
            host            : info.DB_HOST,
            user            : info.DB_USERNAME,
            password        : info.DB_PASSWORD,
            database        : info.DB_DATABASE,
            debug           : false,
            charset         : 'utf8mb4'
        });
    }

    query(sql, args) {
        return new Promise((resolve, reject) => {
            this.connection.query(sql, args, (err, rows) => {
                if (err)
                    return reject(err);
                resolve(rows);
            });
        });
    }

    close() {
        return new Promise((resolve, reject) => {
            this.connection.end(err => {
                if (err)
                    return reject(err);
                resolve();
            });
        });
    }
}

module.exports = new Db();