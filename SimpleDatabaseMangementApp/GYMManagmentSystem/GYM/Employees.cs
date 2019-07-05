namespace GYM
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class Employees
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int employeeId { get; set; }

        [Required]
        [StringLength(30)]
        public string firstName { get; set; }

        [Required]
        [StringLength(30)]
        public string lastName { get; set; }

        public int age { get; set; }

        [Required]
        [StringLength(10)]
        public string gender { get; set; }

        public int bossId { get; set; }

        public virtual Bosses Bosses { get; set; }

        public virtual Instructors Instructors { get; set; }

        public virtual Workers Workers { get; set; }
    }
}
