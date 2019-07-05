using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace GYM
{
    public partial class EmployeesForm : Form
    {
        public EmployeesForm()
        {
            InitializeComponent();

            GYM_database gymDatabaseContext = new GYM_database();

            var workers = from w in gymDatabaseContext.Workers select w;
            foreach (Workers w in workers)
                rtbWorkers.AppendText(w.Employees.firstName + " " + w.Employees.lastName + "\n");

            var instructors = from i in gymDatabaseContext.Instructors select i;
            foreach (Instructors i in instructors)
                rtbInstructors.AppendText(i.Employees.firstName + " " + i.Employees.lastName + "\n");
        }
    }
}
