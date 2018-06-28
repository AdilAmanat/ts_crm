<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRM_Model extends CI_Model {

    protected $export = false;

    public function __construct() {
        parent::__construct();
    }

    public function use_get() {
        $input = $this->input->get();

        if ($input) {
            if (isset($input['sort'])) {
                $input['sort'] = str_replace('-', '.', $input['sort']);

                $sorts = explode('__', $input['sort']);

                if (isset($input['sort_type']) && !empty($input['sort_type']))
                    foreach ($sorts as &$sort)
                        $sort .= ' ' . $input['sort_type'];

                $this->db->order_by(implode(', ', $sorts));
            }

            if (isset($input['filter'])) {
                foreach ($input['filter'] as $column => $value) {
                    $column = str_replace('-', '.', $column);

                    if ($value != '') {
                        if (strstr($column, '__') === false) {
                            $this->db->where($column, $value);
                        } else {
                            $filters = explode('__', $column);

                            foreach ($filters as $filter)
                                $this->db->where($filter, $value);
                        }
                    }
                }
            }

            if (isset($input['filter_or'])) {
                foreach ($input['filter_or'] as $column => $value) {
                    $column = str_replace('-', '.', $column);

                    if ($value != '') {
                        if (strstr($column, '__') === false) {
                            $this->db->or_where($column, $value);
                        } else {
                            $filters = explode('__', $column);

                            foreach ($filters as $filter)
                                $this->db->or_where($filter, $value);
                        }
                    }
                }
            }


            if (isset($input['filter_like'])) {
                foreach ($input['filter_like'] as $column => $value) {
                    $column = str_replace('-', '.', $column);

                    if ($value != '') {
                        if (strstr($column, '__') === false) {
                            $this->db->like($column, $value);
                        } else {
                            //$filter_likes = explode('__', $column);
                            $filter_likes = str_replace('__', ', " ", ', $column);

                            //foreach ($filter_likes as $filter_like)
                            //$this->db->or_like($filter_like, $value);
                            $this->db->like('CONCAT(' . $filter_likes . ')', $value);
                        }
                    }
                }
            }

            if (isset($input['export'])) {
                $this->export = true;
                $this->db->limit(999999999);
            }
        }
    }

    public function export_to_csv($data) {
        $exports = explode(',', $this->input->get('export'));

        $heads = array();
        $columns = array();

        foreach ($exports as $export) {
            $heads[] = trim(strstr($export, '=', true), '=');
            $columns[] = trim(strstr($export, '=', false), '=');
        }

        header('Content-Type: text/csv');
        header("Cache-Control: no-store, no-cache");
        header('Content-Disposition: attachment; filename="araam-data-export.csv"');

        $fp = fopen('php://output', 'w');

        fputcsv($fp, $heads, ',', '"');

        foreach ($data as $row) {
            $row_to_export = array();

            foreach ($columns as $column) {
                if (strstr($column, '__') === false) {
                    $row_to_export[] = $row[$column];
                } else {
                    $concated_columns = explode('__', $column);

                    $concated_values = array();

                    foreach ($concated_columns as $concated_column)
                        $concated_values[] = $row[$concated_column];

                    $row_to_export[] = implode(' ', $concated_values);
                }
            }

            fputcsv($fp, $row_to_export, ',', '"');
        }

        fclose($fp);
        exit;
    }

}
